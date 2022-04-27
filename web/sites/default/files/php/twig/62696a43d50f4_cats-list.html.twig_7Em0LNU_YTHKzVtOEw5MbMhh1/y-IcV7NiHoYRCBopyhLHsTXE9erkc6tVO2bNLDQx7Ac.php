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
        // line 9
        echo "
";
        // line 10
        if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Delete and edit cats"], "method", false, false, true, 10)) {
            // line 11
            echo "<button class=\"cats-delete-multiple\" data-itemsId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            echo "\">DELETE SELECTED</button>
<button class=\"cats-delete-all\">DELETE ALL</button>
";
        }
        // line 14
        echo "<ul class=\"cats-list\">
  ";
        // line 15
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 16
            echo "    <li class=\"cats-item\">
      <input data-itemId=\"";
            // line 17
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "\" class=\"cat-check\" type=\"checkbox\">
      <div class=\"cats-img-container\">
        <a class=\"cats-img-link\" href=\"";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "\">
          <img class=\"cats-photo\" src=\"";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_photo", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            echo "\" alt=\"photo cat\">
        </a>
      </div>
      <div class=\"cats-info\">
        <div class=\"cats-name\">";
            // line 24
            echo t("Cat`s name:", array());
            echo " <span data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "\" class=\"cats-name-value\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "cat_name", [], "any", false, false, true, 24), 24, $this->source), "html", null, true);
            echo "</span></div>
        <div class=\"cats-email\" data-itemId=\"";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 25), 25, $this->source), "html", null, true);
            echo "\">";
            echo t("Email:", array());
            // line 26
            echo "          <a data-itemId=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
            echo "\" href=\"mailto:";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
            echo "\" class=\"cats-email-link\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "email", [], "any", false, false, true, 26), 26, $this->source), "html", null, true);
            echo "</a>
        </div>
      </div>
      <div class=\"cats-timestamp\">";
            // line 29
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "timestamp", [], "any", false, false, true, 29), 29, $this->source), "html", null, true);
            echo "</div>
      ";
            // line 30
            if (twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", [0 => "Delete and edit cats"], "method", false, false, true, 30)) {
                // line 31
                echo "        <div class=\"cats-editor\">
          <button class=\"cats-edit\" data-itemId=\"";
                // line 32
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
                echo "\">EDIT</button>
          <button class=\"cats-delete\" data-itemId=\"";
                // line 33
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "id", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
                echo "\">DELETE</button>
        </div>
      ";
            }
            // line 36
            echo "    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 38
        echo "</ul>

";
        // line 40
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteForm"] ?? null), 40, $this->source), "html", null, true);
        echo "
";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["EditForm"] ?? null), 41, $this->source), "html", null, true);
        echo "
";
        // line 42
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteAllForm"] ?? null), 42, $this->source), "html", null, true);
        echo "
";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["DeleteMultipleForm"] ?? null), 43, $this->source), "html", null, true);
        echo "


";
        // line 46
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("pablo/pablo-module"), "html", null, true);
        echo "
";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("pablo/cats-list"), "html", null, true);
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
        return array (  152 => 47,  148 => 46,  142 => 43,  138 => 42,  134 => 41,  130 => 40,  126 => 38,  119 => 36,  113 => 33,  109 => 32,  106 => 31,  104 => 30,  100 => 29,  89 => 26,  85 => 25,  77 => 24,  70 => 20,  66 => 19,  61 => 17,  58 => 16,  54 => 15,  51 => 14,  44 => 11,  42 => 10,  39 => 9,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/pablo/templates/cats-list.html.twig", "/var/www/local.site/web/modules/custom/pablo/templates/cats-list.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 10, "for" => 15, "trans" => 24);
        static $filters = array("escape" => 11);
        static $functions = array("attach_library" => 46);

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
