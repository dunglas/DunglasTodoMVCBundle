<?php

/* DunglasTodoMVCBundle:Default:index.html.twig */
class __TwigTemplate_3af234ec9c79325c765d1be00af289f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"en\">
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
\t<title>";
        // line 6
        echo $this->env->getExtension('translator')->getTranslator()->trans("Symfony with Chaplin.js and Backbone.js", array(), "messages");
        echo " • TodoMVC</title>
\t";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "f6591b5_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f6591b5_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f6591b5_base_1.css");
            // line 10
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
        ";
            // asset "f6591b5_1"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f6591b5_1") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f6591b5_app_2.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
        ";
        } else {
            // asset "f6591b5"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_f6591b5") : $this->env->getExtension('assets')->getAssetUrl("_controller/css/f6591b5.css");
            echo "        <link href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" rel=\"stylesheet\" media=\"screen\" />
        ";
        }
        unset($context["asset_url"]);
        // line 12
        echo "\t<!--[if IE]>
        ";
        // line 13
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "7a8a89c_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7a8a89c_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/7a8a89c_ie_1.js");
            // line 14
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "7a8a89c"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7a8a89c") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/7a8a89c.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 16
        echo "\t<![endif]-->
</head>
<body>
\t<section id=\"todoapp\">
\t\t<header id=\"header\">
\t\t\t<h1>";
        // line 21
        echo $this->env->getExtension('translator')->getTranslator()->trans("todos", array(), "messages");
        echo "</h1>
\t\t\t<input id=\"new-todo\" placeholder=\"";
        // line 22
        echo $this->env->getExtension('translator')->getTranslator()->trans("What needs to be done?", array(), "messages");
        echo "\" autofocus>
\t\t</header>
\t\t<!-- This section should be hidden by default and shown when there are todos -->
\t\t<section id=\"main\">
\t\t\t<input id=\"toggle-all\" type=\"checkbox\">
\t\t\t<label for=\"toggle-all\">";
        // line 27
        echo $this->env->getExtension('translator')->getTranslator()->trans("Mark all as complete", array(), "messages");
        echo "</label>
\t\t\t<ul id=\"todo-list\">
\t\t\t</ul>
\t\t</section>
\t\t<!-- This footer should hidden by default and shown when there are todos -->
\t\t<footer id=\"footer\">
\t\t\t<!-- This should be `0 items left` by default -->
\t\t\t<span id=\"todo-count\"><strong>0</strong> item left</span>
\t\t\t<!-- Remove this if you don't implement routing -->
\t\t\t<ul id=\"filters\">
\t\t\t\t<li>
\t\t\t\t\t<a class=\"selected\" href=\".\">All</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"active\">Active</a>
\t\t\t\t</li>
\t\t\t\t<li>
\t\t\t\t\t<a href=\"completed\">Completed</a>
\t\t\t\t</li>
\t\t\t</ul>
\t\t\t<button id=\"clear-completed\">Clear completed (1)</button>
\t\t</footer>
\t</section>
\t<footer id=\"info\">
\t\t<p>";
        // line 51
        echo $this->env->getExtension('translator')->getTranslator()->trans("Double-click to edit a todo", array(), "messages");
        echo "</p>

\t\t<p>Created by <a href=\"http://dunglas.fr\">Kévin Dunglas</a></p>
\t\t<p>Part of <a href=\"http://todomvc.com\">TodoMVC</a></p>
\t</footer>
        
        ";
        // line 57
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "8e20e4e_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8e20e4e_0") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/8e20e4e_require-2.1.4_1.js");
            // line 58
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        } else {
            // asset "8e20e4e"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_8e20e4e") : $this->env->getExtension('assets')->getAssetUrl("_controller/js/8e20e4e.js");
            echo "        <script src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
        ";
        }
        unset($context["asset_url"]);
        // line 60
        echo "        <script>
        window.Api = {
            get_todos: '";
        // line 62
        echo twig_escape_filter($this->env, twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("get_todos"), "js"), "html", null, true);
        echo "' 
        }

        window.Data = {
            // TODO: Escape end of script
            todos: ";
        // line 67
        echo $this->env->getExtension('jms_serializer')->serialize((isset($context["todos"]) ? $context["todos"] : $this->getContext($context, "todos")));
        echo "
        }
    
        // Configure the AMD module loader
        requirejs.config({
          // The path where your JavaScripts are located
          baseUrl: '";
        // line 73
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/dunglastodomvc/js/"), "html", null, true);
        echo "',
          // Specify the paths of vendor libraries
          paths: {
            jquery: 'vendor/jquery-1.9.0',
            underscore: 'vendor/underscore-1.4.3',
            backbone: 'vendor/backbone-0.9.10',
            handlebars: 'vendor/handlebars-1.0.rc.2',
            text: 'vendor/require-text-2.0.3',
            chaplin: 'vendor/chaplin'
          },
          // Underscore and Backbone are not AMD-capable per default,
          // so we need to use the AMD wrapping of RequireJS
          shim: {
            underscore: {
              exports: '_'
            },
            backbone: {
              deps: ['underscore', 'jquery'],
              exports: 'Backbone'
            },
            handlebars: {
              exports: 'Handlebars'
            }
          }
          // For easier development, disable browser caching
          // Of course, this should be removed in a production environment
          ";
        // line 99
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "environment") == "dev")) {
            echo ", urlArgs: 'bust=' +  (new Date()).getTime()";
        }
        // line 100
        echo "        });

        // Bootstrap the application
        require(['application'], function (Application) {
          var app = new Application('";
        // line 104
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("dunglas_todomvc_default_index"), "html", null, true);
        echo "');
          app.initialize();
        });
        </script>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "DunglasTodoMVCBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  208 => 104,  202 => 100,  198 => 99,  169 => 73,  160 => 67,  152 => 62,  148 => 60,  134 => 58,  130 => 57,  121 => 51,  94 => 27,  86 => 22,  82 => 21,  75 => 16,  61 => 14,  57 => 13,  54 => 12,  34 => 10,  30 => 7,  26 => 6,  19 => 1,);
    }
}
