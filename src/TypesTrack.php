<?php


namespace MatinUtils\TypesTracker;


trait TypesTrack
{
    /** @inheritdoc */
    public function getAttribute($key)
    {
        if (array_key_exists($key, $this->typesTrackeds ?? [])) {
            if ($this->getAttributeValue($key) === 0) {
                return parent::getAttribute($key);
            }
            return types($this->typesTrackeds[$key], $this->getAttributeValue($key));
        }
        return parent::getAttribute($key);
    }

    /** @inheritdoc */
    public function setAttribute($key, $value)
    {
        if (array_key_exists($key, $this->typesTrackeds ?? [])) {
            $this->attributes[$key] = types($this->typesTrackeds[$key], $value);
            return $this;
        }
        return parent::setAttribute($key, $value);
    }
}
