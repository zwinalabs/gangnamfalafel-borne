<?php

namespace App\Imports;

use App\Categories;
use App\Items;
use App\Restorant;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ItemsImport implements ToModel, WithHeadingRow
{
    public function __construct(Restorant $restorant)
    {
        $this->restorant = $restorant;
        $this->lastCategoryName="";
        $this->lastCategoryID=0;
    }

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $category = Categories::where(['name' => strip_tags($row['category']), 'restorant_id' => $this->restorant->id])->first();
        $CATID=null;
        if($category != null){
            $CATID= $category->id;
        }else{
            //Check last inssert category
            if($this->lastCategoryName==strip_tags($row['category'])){
                $CATID=$this->lastCategoryID;
            }
        }
        if ($CATID != null) {
            
            $item = Items::where(['name' => $row['name'], 'category_id' => $CATID])->first();
        
            if($item == null){       
                return new Items([
                    'name' => $row['name'],
                    'description' => $row['description']?strip_tags($row['description']):"",
                    'price' => str_replace('€', '', strip_tags($row['price'])),
                    'category_id' => $CATID,
                    'image' => $row['image'] ? $row['image'] : "",
                    'available' => strip_tags($row['active']),
                    'product_id_hiboutik' => strip_tags($row['hiboutik']),
                ]); 
            }else{
                //Update
                $item->price=strip_tags($row['price']);
                $item->image =$row['image'] ? $row['image'] : "";
                $item->category_id =$CATID;
                $item->description =$row['description']?strip_tags($row['description']):"";
                $item->available = strip_tags($row['active']);
                $item->product_id_hiboutik = strip_tags($row['hiboutik']);
                $item->save();
            }
        } else {
            $newCat=new Categories([
                'name'=>strip_tags($row['category']),
                'restorant_id'=>$this->restorant->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $newCat->save();
            $categoryID=$newCat->id;
            $this->lastCategoryID=$categoryID;
            $this->lastCategoryName=$row['category'];


            

            return new Items([
                'name' => strip_tags($row['name']),
                'description' => strip_tags($row['description']),
                'price' => strip_tags($row['price']),
                'category_id' => $categoryID,
                'image' => $row['image'] ? $row['image'] : "",
                'available' => strip_tags($row['active']),
                'product_id_hiboutik' => strip_tags($row['hiboutik']),
            ]);
        }
    }
}
