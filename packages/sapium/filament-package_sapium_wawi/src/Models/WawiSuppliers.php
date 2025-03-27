<?php

namespace Sapium\FilamentPackageSapiumWawi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WawiSuppliers extends Model
{
    use HasFactory; 

    protected $table = "wawi_suppliers";
    protected $fillable = ['name', 'description','phone','email', 'location', 'contact_person'];

}