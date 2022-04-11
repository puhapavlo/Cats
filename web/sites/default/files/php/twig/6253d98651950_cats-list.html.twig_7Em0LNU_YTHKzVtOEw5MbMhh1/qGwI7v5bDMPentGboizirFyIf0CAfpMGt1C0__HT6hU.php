<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/custom/pablo/templates/cats-list.html.twig */
class __TwigTemplate_c01f97ddfd93877efd05d2b463d97a18205622385e2b9916a0d288b15b616b93 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Delete and edit cats"], "method", false, false, true, 1)) {
            // line 2
            echo "<button class=\"cats-delete-multiple\" data-itemsId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, true, 2), 2, $this->source), "html", null, true);
            echo "\">DELETE SELECTED</button>
<button class=\"cats-delete-all\">DELETE ALL</button>
";
        }
        // line 5
        echo "<ul class=\"cats-list\">
  ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 7
            echo "    <li class=\"cats-item\">
      <input data-itemId=\"";
            // line 8
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "\" class=\"cat-check\" type=\"checkbox\">
      <div class=\"cats-img-container\">
        <a class=\"cats-img-link\" href=\"";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 10), 10, $this->source), "html", null, true);
            echo "\">
          <img class=\"cats-photo\" src=\"";
            // line 11
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            echo "\" alt=\"photo cat\">
        </a>
      </div>
      <div class=\"cats-info\">
        <div class=\"cats-name\">";
            // line 15
            echo t("Cat`s name:", array());
            echo " <span data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "\" class=\"cats-name-value\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_name", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "</span></div>
        <div class=\"cats-email\" data-itemId=\"";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "\">";
            echo t("Email:", array());
            // line 17
            echo "          <a data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "\" href=\"mailto:";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "\" class=\"cats-email-link\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "</a>
        </div>
      </div>
      <div class=\"cats-timestamp\">";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "timestamp", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            echo "</div>
      ";
            // line 21
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Delete and edit cats"], "method", false, false, true, 21)) {
                // line 22
                echo "        <div class=\"cats-editor\">
          <button class=\"cats-edit\" data-itemId=\"";
                // line 23
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 23), 23, $this->source), "html", null, true);
                echo "\">EDIT</button>
          <button class=\"cats-delete\" data-itemId=\"";
                // line 24
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
                echo "\">DELETE</button>
        </div>
      ";
            }
            // line 27
            echo "    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 29
        echo "</ul>

";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteForm"] ?? null), 31, $this->source), "html", null, true);
        echo "
";
        // line 32
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["EditForm"] ?? null), 32, $this->source), "html", null, true);
        echo "
";
        // line 33
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteAllForm"] ?? null), 33, $this->source), "html", null, true);
        echo "
";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteMultipleForm"] ?? null), 34, $this->source), "html", null, true);
        echo "


";
        // line 37
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cats_theme/pablo-module"), "html", null, true);
        echo "
";
        // line 38
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cats_theme/cats-list"), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/custom/pablo/templates/cats-list.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  149 => 38,  145 => 37,  139 => 34,  135 => 33,  131 => 32,  127 => 31,  123 => 29,  116 => 27,  110 => 24,  106 => 23,  103 => 22,  101 => 21,  97 => 20,  86 => 17,  82 => 16,  74 => 15,  67 => 11,  63 => 10,  58 => 8,  55 => 7,  51 => 6,  48 => 5,  41 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/pablo/templates/cats-list.html.twig", "/var/www/local.site/web/modules/custom/pablo/templates/cats-list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 1, "for" => 6, "trans" => 15);
        static $filters = array("escape" => 2);
        static $functions = array("attach_library" => 37);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'trans'],
                ['escape'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
