<?php

namespace App\Imports;

use App\Models\Branch;
use App\Models\BranchLevel;
use App\Models\LineType;
use App\Models\Network;
use App\Models\Project;
use App\Models\Router;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BranchesImport implements ToCollection
{
    protected function createOrUpdateNetwork($name)
    {
        $network = Network::where('name', 'like', '%' . mb_strtolower($name) . '%')->first();

        if (!$network) {
            Network::create(
                ['name' => $name]
            );
        }

        return $network;
    }

    protected function createOrUpdateProject($name)
    {
        $project = Project::where('name', 'like', '%' . mb_strtolower($name) . '%')->first();

        if (!$project) {
            Project::create(
                ['name' => $name]
            );
        }

        return $project;
    }

    public function createOrUpdateBranchLevel($name)
    {
        $level = BranchLevel::where('name', 'like', '%' . mb_strtolower($name) . '%')->first();

        if (!$level) {
            BranchLevel::create(
                ['name' => $name]
            );
        }

        return $level;
    }

    public function createOrUpdateLineType($name)
    {
        $lineType = LineType::where('name', 'like', '%' . mb_strtolower($name) . '%')->first();

        if (!$lineType) {
            LineType::create(
                ['name' => $name]
            );
        }

        return $lineType;
    }

    public function createOrUpdateRouter($name, $number)
    {
        $router = Router::where('name', 'like', '%' . mb_strtolower($name) . '%')->first();

        if (!$router) {
            Router::create(
                ['name' => $name],
                ['number' => $number]
            );
        }

        return $router;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $i => $item) {
            if ($i === 0) continue;
            $data = [
                'main_order_id' => $item[1],
                'backup_order_id' => $item[2],
                'network_id' => $this->createOrUpdateNetwork($item[3])?->id,
                'name' => [
                    'en' => $item[4],
                    'ar' => $item[4],
                ],
                'area' => $item[5],
                'financial_code' => $item[6],
                'wan_ip' => $item[7],
                'lan_ip' => $item[8],
                'tunnel_ip' => $item[9],
                'additional_ips' => $item[10],
                'project_id' => $this->createOrUpdateProject($item[11])?->id,
                'line_capacity' => $item[12],
                'notes' => $item[13],
                'user_id' => auth()->id(),
                'sector' => $item[18],
                'post_number' => $item[19],
                'technical_support_name' => str_replace('-', '', preg_replace('/[0-9]+/', '', $item[20])),
                'technical_support_phone' => $item[21],
                'branch_manager_name' => $item[22],
                'branch_manager_phone' => $item[23],
                'branch_level_id' => $this->createOrUpdateBranchLevel($item[24])?->id,
                'modeling' => $item[27],
                'ups_installation' => $item[29],
                'address' => $item[30],
                'phone' => $item[31],
                'line_type_id' => $this->createOrUpdateLineType($item[32])?->id,
                'ip_notes' => $item[33],
                'installation_and_commissioning' => (bool)$item[36],
            ];
            Branch::create($data);
        }
    }
}
