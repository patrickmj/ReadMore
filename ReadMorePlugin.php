<?php

class ReadMorePlugin extends Omeka_Plugin_AbstractPlugin
{
    protected $_filters = array('filterReadMore' => array('Display', 'Item', 'Dublin Core', 'Description') );


    public function filterReadMore($text, $args)
    {
        if(isset($_GET['read_more']) && $_GET['read_more'] == true) {
            return $text;
        }
        $record = $args['record'];
        $url = url("items/show/{$record->id}?read_more=true");
        $link = "<a href='$url'>(read more about " . metadata($record, array('Dublin Core', 'Title')) . " )</a>";
        $snippet = snippet($text, 0, 200, $link);
        return $snippet;
    }
}