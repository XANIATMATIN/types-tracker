<?php

namespace MatinUtils\TypesTracker;

class Tracker
{
    private $types = [];
    public function __construct()
    {
        $this->reload();
    }

    public function reload()
    {
        $types = Types::all()->toArray();
        if (empty($types)) {
            return;
        }
        foreach ($types as  $item) {
            $this->types[$item['category']][$item['id']] = $item['name'];
        }
    }

    public function category($category = null)
    {
        return empty($category) ? array_keys($this->types) : $this->types[$category] ?? null;
    }

    public function getName($category = null, $id = null)
    {
        return empty($category) ? array_keys($this->types) : (empty($id) ? array_values($this->types[$category] ?? []) : $this->types[$category][$id] ?? null);
    }

    public function getId($category = null, $name = null)
    {
        return empty($category) ? array_keys($this->types) : (empty($name) ? array_keys(array_flip($this->types[$category] ?? [])) : array_flip($this->types[$category])[$name] ?? null);
    }

    public function search($category = null, $case = null)
    {
        if (empty($category)) {
            return array_keys($this->types);
        }
        if ($case === 0) {
            return $this->types[$category] ?? [];
        }
        if (empty($case)) {
            return array_values($this->types[$category] ?? []);
        }
        if (is_numeric($case)) {
            return $this->types[$category][$case] ?? null;
        }
        if (is_string($case)) {
            return array_flip($this->types[$category])[$case] ?? null;
        }
        return [];
    }
}
