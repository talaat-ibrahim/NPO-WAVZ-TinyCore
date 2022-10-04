<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BranchLevel extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function network(){
        return $this->belongsTo(Network::class);
    }

    public function project(){
        return $this->belongsTo(Project::class);
    }

    public function lineCapacity(){
        return $this->belongsTo(LineCapacitie::class);
    }

    public function lineType(){
        return $this->belongsTo(LineType::class);
    }

    public function branchLevel(){
        return $this->belongsTo(BranchLevel::class);
    }

    public function routerName(){
        return $this->belongsTo(Router::class, 'router_model_id' );
    }

    public function upsInstallation(){
        return $this->belongsTo(UpsInstallation::class,'ups_installation_id');
    }

    public function model(){
        return $this->belongsTo(SwitchModel::class);
    }

    public function entutiyStatus(){
        return $this->belongsTo(EntuityStatus::class);
    }

    public function government(){
        return $this->belongsTo(Government::class);
    }
}
