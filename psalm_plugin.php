<?php
namespace Muglug\PsalmPlugins;

use PhpParser;
use Psalm\Context;
use Psalm\CodeLocation;
use Psalm\StatementsSource;
use Psalm\Checker\StatementsChecker;
use Psalm\FileManipulation\FileManipulation;
use Psalm\Scanner\FileScanner;
use Psalm\Storage\ClassLikeStorage;
use Psalm\Type\Union;

class WordPressFunctions extends \Psalm\Plugin
{
    /**
     * @param  string $function_id - the method id being checked
     * @param  PhpParser\Node\Arg[] $args
     * @param  FileManipulation[] $file_replacements
     *
     * @return void
     */
    public static function afterFunctionCallCheck(
        StatementsSource $statements_source,
        $function_id,
        array $args,
        CodeLocation $code_location,
        Context $context,
        array &$file_replacements = [],
        Union &$return_type_candidate = null
    ) {
        if ($function_id === 'get_post') {
            if (count($args) < 2
                || ($args[1]->value instanceof PhpParser\Node\Expr\ConstFetch
                    && $args[1]->value->name->parts[0] === 'OBJECT')
            ) {
                $return_type_candidate = \Psalm\Type::parseString('WP_Post|null');
                return;
            }

            if ($args[1]->value instanceof PhpParser\Node\Expr\ConstFetch
                && ($args[1]->value->name->parts[0] === 'ARRAY_A'
                    || $args[1]->value->name->parts[0] === 'ARRAY_N')
            ) {
                $return_type_candidate = \Psalm\Type::parseString('array|null');
                return;
            }
        }

        if ($function_id === 'get_comment') {
            if (count($args) < 2
                || ($args[1]->value instanceof PhpParser\Node\Expr\ConstFetch
                    && $args[1]->value->name->parts[0] === 'OBJECT')
            ) {
                $return_type_candidate = \Psalm\Type::parseString('WP_Comment|null');
                return;
            }

            if ($args[1]->value instanceof PhpParser\Node\Expr\ConstFetch
                && ($args[1]->value->name->parts[0] === 'ARRAY_A'
                    || $args[1]->value->name->parts[0] === 'ARRAY_N')
            ) {
                $return_type_candidate = \Psalm\Type::parseString('array|null');
                return;
            }
        }

        if ($function_id === 'get_term') {
            if (count($args) < 3
                || ($args[2]->value instanceof PhpParser\Node\Expr\ConstFetch
                    && $args[2]->value->name->parts[0] === 'OBJECT')
            ) {
                $return_type_candidate = \Psalm\Type::parseString('WP_Term|null');
                return;
            }

            if ($args[2]->value instanceof PhpParser\Node\Expr\ConstFetch
                && ($args[2]->value->name->parts[0] === 'ARRAY_A'
                    || $args[2]->value->name->parts[0] === 'ARRAY_N')
            ) {
                $return_type_candidate = \Psalm\Type::parseString('array|null');
                return;
            }
        }

        if ($function_id === 'get_term_by') {
            if (count($args) < 4
                || ($args[3]->value instanceof PhpParser\Node\Expr\ConstFetch
                    && $args[3]->value->name->parts[0] === 'OBJECT')
            ) {
                $return_type_candidate = \Psalm\Type::parseString('WP_Term|null');
                return;
            }

            if ($args[3]->value instanceof PhpParser\Node\Expr\ConstFetch
                && ($args[3]->value->name->parts[0] === 'ARRAY_A'
                    || $args[3]->value->name->parts[0] === 'ARRAY_N')
            ) {
                $return_type_candidate = \Psalm\Type::parseString('array|null');
                return;
            }
        }
    }
}