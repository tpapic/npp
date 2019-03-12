<?php

namespace App\Queries;

class AppQuery
{
    public static function searchFilter($entity, $search, $searchType, 
        $attributes, $relationship = null)
    {
        switch ($searchType) {
            case 1:
                $search = '%' . $search . '%';
                return self::buildSearchQuery($entity, $search, 
                    $attributes, 'LIKE', $relationship);
            case 2:
                $search = '%' . $search . '%';
                return self::buildSearchQuery($entity, $search, 
                    $attributes, 'NOT LIKE', $relationship);
            case 3:
                return self::buildSearchQuery($entity, $search, 
                    $attributes, 'LIKE', $relationship);
            case 4:
                $search = $search . '%';
                return self::buildSearchQuery($entity, $search, 
                    $attributes, 'LIKE', $relationship);
            default:
                $search = '%' . $search . '%';
                return self::buildSearchQuery($entity, $search, 
                    $attributes, 'LIKE', $relationship);
        }
    }

    public static function buildSearchQuery($entity, $search,
        $attributes, $condition, $relationship) 
    {
        if(is_null($relationship)) {
            return $entity->where(function($q) use ($search, $attributes, $condition) {
                        foreach ($attributes as $attribute) {
                            $q->orWhere($attribute, $condition, $search);
                        }
                    });
        }

        return $entity->whereHas($relationship, function ($q) use ($search, $attributes, $condition) {
                    $q->where(function($q) use ($search, $attributes, $condition) {
                        foreach ($attributes as $attribute) {
                            $q->orWhere($attribute, $condition, $search);
                        }
                    });
                });
    }
}
