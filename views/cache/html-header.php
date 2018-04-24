<!doctype html>
<!--[if lt IE 7]><html class="no-js ie ie6 lt-ie9 lt-ie8 lt-ie7" {{site.language_attributes}}> <![endif]-->
<!--[if IE 7]><html class="no-js ie ie7 lt-ie9 lt-ie8" {{site.language_attributes}}> <![endif]-->
<!--[if IE 8]><html class="no-js ie ie8 lt-ie9" {{site.language_attributes}}> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" {{site.language_attributes}}> <!--<![endif]-->
<head>
    <meta charset="{{site.charset}}" />
        <title>   
            {% if wp_title %}
                {{ wp_title }} - {{ site.name }}
            {% else %}
                {{ site.name }}
            {% endif %}
        </title>
    <meta name="description" content="{{site.description}}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <link rel="pingback" href="{{site.pingback_url}}" />
    <link href="https://fonts.googleapis.com/css?family=Cabin:500,400|Source+Code+Pro:600,400|Hind:400,500,600" rel="stylesheet">
    {{function('wp_head')}}
