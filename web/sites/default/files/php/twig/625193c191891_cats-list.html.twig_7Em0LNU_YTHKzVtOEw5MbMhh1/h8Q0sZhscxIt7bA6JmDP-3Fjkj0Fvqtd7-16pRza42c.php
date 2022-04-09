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
        echo "<button class=\"cats-delete-multiple\" data-itemsId=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, true, 1), 1, $this->source), "html", null, true);
        echo "\">DELETE SELECTED</button>
<button class=\"cats-delete-all\">DELETE ALL</button>
<ul class=\"cats-list\">
  ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 5
            echo "    <li class=\"cats-item\">
      <input class=\"cat-check\" type=\"checkbox\">
      <div class=\"cats-img-container\">
        <a class=\"cats-img-link\" href=\"";
            // line 8
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 8), 8, $this->source), "html", null, true);
            echo "\">
          <img class=\"cats-photo\" src=\"";
            // line 9
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 9), 9, $this->source), "html", null, true);
            echo "\" alt=\"photo cat\">
        </a>
      </div>
      <div class=\"cats-info\">
        <div class=\"cats-name\">";
            // line 13
            echo t("Cat`s name:", array());
            echo " <span data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "\" class=\"cats-name-value\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_name", [], "any", false, false, true, 13), 13, $this->source), "html", null, true);
            echo "</span></div>
        <div class=\"cats-email\" data-itemId=\"";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 14), 14, $this->source), "html", null, true);
            echo "\">";
            echo t("Email:", array());
            // line 15
            echo "          <a data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "\" href=\"mailto:";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "\" class=\"cats-email-link\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "</a>
        </div>
      </div>
      <div class=\"cats-timestamp\">";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "timestamp", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
            echo "</div>
      ";
            // line 19
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Delete and edit cats"], "method", false, false, true, 19)) {
                // line 20
                echo "        <div class=\"cats-editor\">
          <button class=\"cats-edit\" data-itemId=\"";
                // line 21
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 21), 21, $this->source), "html", null, true);
                echo "\">EDIT</button>
          <button class=\"cats-delete\" data-itemId=\"";
                // line 22
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 22), 22, $this->source), "html", null, true);
                echo "\">DELETE</button>
        </div>
      ";
            }
            // line 25
            echo "    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "</ul>

";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteForm"] ?? null), 29, $this->source), "html", null, true);
        echo "
";
        // line 30
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["EditForm"] ?? null), 30, $this->source), "html", null, true);
        echo "
";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteAllForm"] ?? null), 31, $this->source), "html", null, true);
        echo "


";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("cats_theme/pablo-module"), "html", null, true);
        echo "
";
        // line 35
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
        return array (  137 => 35,  133 => 34,  127 => 31,  123 => 30,  119 => 29,  115 => 27,  108 => 25,  102 => 22,  98 => 21,  95 => 20,  93 => 19,  89 => 18,  78 => 15,  74 => 14,  66 => 13,  59 => 9,  55 => 8,  50 => 5,  46 => 4,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/pablo/templates/cats-list.html.twig", "/var/www/local.site/web/modules/custom/pablo/templates/cats-list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 4, "trans" => 13, "if" => 19);
        static $filters = array("escape" => 1);
        static $functions = array("attach_library" => 34);

        try {
            $this->sandbox->checkSecurity(
                ['for', 'trans', 'if'],
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
