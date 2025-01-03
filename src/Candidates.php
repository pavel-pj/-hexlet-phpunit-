<?php

namespace Hexlet\Phpunit\Candidates;

use Illuminate\Support\Collection;

function getFilteredGender(array|Collection $arr, string $gender): Collection
{
    return collect($arr)->filter(function (mixed $key,mixed $value) use ($gender) {
        return $key['gender'] == $gender;
    });
}

function getNames(array|Collection $arr): Collection
{
    if (empty($arr)) {
        return collect([]);
    }

    return collect($arr)->map(function ( mixed $item,mixed $key){
         return $item['name'];
    })->values();

}

function getBirthdayByName(array|Collection $arr, string $name)// : Collection
{
    $coll =  collect($arr)->where('name', $name)->select('birthday')->values() ;

    $count = $coll->count();

    if ($count == 0) {
         throw new \Exception("\n\n***Error***\nEmpty Collection\n\n");
     }
    return $coll ;

}

function printValue(mixed $value): void
{
    echo $value;
}

function getLast(array $arr)
{
    $coll = collect($arr)->last();
    return $coll;
}



function groupByYear(array $arr) :Collection
{

    return collect($arr)->select(['name','birthday'])
        ->sortBy(function($item,$key){
            return substr($item['birthday'],0,4);
        })
        ->groupBy(function($item) {
        return substr($item['birthday'],0,4);
    });


}








