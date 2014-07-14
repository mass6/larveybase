<?php

function gravatar_url($email)
{
    return 'http://gravatar.com/avatar/' . md5($email) . '?s=40';
}

function link_to_task($task)
{
    return link_to_route('user.tasks.show', $task->title, [$task->user->username, $task->id]);
}


function isActive($link, $seg = 1, $parent = false)
{
    $class = '';
    $segment = Request::segment($seg);
    if ($segment == $link){
        if ($parent == true){
            return 'opened active';
        }
        else return 'active';
    }
    return '';
}


function jsonToArray($jsonArray)
{
    if(isset($jsonArray))
    {
        $jsonArray = json_decode($jsonArray);

        // final array to be returned
        $attributes = array();

        foreach ($jsonArray as $attribute)
        {
            // if only 1 index, add second blank index
            if ( ! is_object($attribute)  ) {
                $attribute = array($attribute => "");
            }

            foreach($attribute as $key => $val)
            {
                $attributes[] = array($key, $val);
            }

        }
        return json_encode($attributes);
    }
    else
        return false;
}

/**
 * Converts and object to an array
 *
 * @param $data
 * @return array
 */
function object_to_array($data)
{
    if(is_array($data) || is_object($data))
    {
        $result = array();

        foreach($data as $key => $value) {
            $result[$key] = object_to_array($value);
        }

        return $result;
    }

    return $data;
}

function object_to_simple_array($data)
{
    if(is_array($data) || is_object($data))
    {
        $result = array();

        foreach($data as $key => $value) {
            $result[$key] = object_to_array($value);
        }

        return $result;
    }

    return $data;
}