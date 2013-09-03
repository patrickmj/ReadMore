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
        $link = link_to($record, 'show', " (read more)", array(), array('read_more'=>'true') );
        $snippet = snippet($text, 0, 200, $link);        
        return $snippet;
    }
}