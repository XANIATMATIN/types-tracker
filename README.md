# Types Tracker
---
## Summery
a usefull utility for track all types in laravel/lumen application

## install 
## usage
### helper function
`types()`
### application 
`app('types')`

## category
* list all available categories `types()->category()`
```
[
    "nodeType",
    "licenceType",
    "travelService",
]
```
* get available category `types()->category('nodeType')`
```
[
    1 => "enterprise",
    2 => "light",
]
```

## get types
* get Type Name by Id
```
types()->getName('nodeType',1)
//<return> "enterprise"
```
* get Type Id by Name
```
types()->getId('nodeType','light')
//<return> 2
```