<?php
/**
 * PHP Coding Standards Fixer
 *
 * @link https://cs.symfony.com/
 * @link https://mlocati.github.io/php-cs-fixer-configurator/
 */
$dirs = [
    __DIR__ . '/builder',
    __DIR__ . '/src',
    __DIR__ . '/tests',
];

$rules = [
    '@PSR12'            => true,
    'array_indentation' => true,
    'array_syntax'      => [
        'syntax' => 'short',
    ],
    'binary_operator_spaces' => [
        'default'   => 'single_space',
        'operators' => [
            '=>' => 'align_single_space_minimal',
        ],
    ],
    'cast_spaces' => [
        'space' => 'none',
    ],
    'class_attributes_separation' => [
        'elements' => [
            'const'        => 'one',
            'method'       => 'one',
            'property'     => 'one',
            'trait_import' => 'none',
        ],
    ],
    'clean_namespace' => true,
    'concat_space'    => [
        'spacing' => 'one',
    ],
    'declare_parentheses'                    => true,
    'explicit_string_variable'               => true,
    'fully_qualified_strict_types'           => true,
    'general_phpdoc_tag_rename'              => true,
    'heredoc_to_nowdoc'                      => true,
    'integer_literal_case'                   => true,
    'linebreak_after_opening_tag'            => true,
    'list_syntax'                            => true,
    'magic_constant_casing'                  => true,
    'magic_method_casing'                    => true,
    'method_chaining_indentation'            => true,
    'multiline_whitespace_before_semicolons' => [
        'strategy' => 'no_multi_line',
    ],
    'native_function_casing'           => true,
    'native_type_declaration_casing'   => true,
    'no_alias_language_construct_call' => true,
    'no_alternative_syntax'            => true,
    'no_blank_lines_after_phpdoc'      => true,
    'no_empty_phpdoc'                  => true,
    'no_extra_blank_lines'             => [
        'tokens' => [
            'extra',
            'use',
        ],
    ],
    'no_leading_namespace_whitespace' => true,
    'no_mixed_echo_print'             => [
        'use' => 'echo',
    ],
    'no_multiline_whitespace_around_double_arrow' => true,
    'no_short_bool_cast'                          => true,
    'no_singleline_whitespace_before_semicolons'  => true,
    'no_spaces_around_offset'                     => [
        'positions' => [
            'inside',
            'outside',
        ],
    ],
    'no_superfluous_phpdoc_tags' => [
        'allow_mixed'         => true,
        'allow_unused_params' => true,
    ],
    'no_trailing_comma_in_singleline' => true,
    'no_unneeded_braces'              => true,
    'no_unneeded_control_parentheses' => [
        'statements' => [
            'break',
            'clone',
            'continue',
            'echo_print',
            'return',
            'switch_case',
            'yield',
        ],
    ],
    'no_unset_cast'                                    => true,
    'no_unused_imports'                                => true,
    'no_useless_return'                                => true,
    'no_whitespace_before_comma_in_array'              => true,
    'not_operator_with_successor_space'                => true,
    'normalize_index_brace'                            => true,
    'nullable_type_declaration'                        => true,
    'nullable_type_declaration_for_default_null_value' => [
        'use_nullable_type_declaration' => false,
    ],
    'object_operator_without_whitespace' => true,
    'ordered_imports'                    => [
        'imports_order' => [
            'class',
            'const',
            'function',
        ],
        'sort_algorithm' => 'alpha',
    ],
    'phpdoc_align' => [
        'align'   => 'vertical',
        'spacing' => 1,
        'tags'    => [
            'method',
            'param',
            'property',
            'property-read',
            'property-write',
            'see',
            'throws',
            'type',
            'uses',
            'var',
        ],
    ],
    'phpdoc_indent'                => true,
    'phpdoc_inline_tag_normalizer' => true,
    'phpdoc_no_access'             => true,
    'phpdoc_no_package'            => true,
    'phpdoc_no_useless_inheritdoc' => true,
    'phpdoc_order'                 => [
        'order' => [
            'runInSeparateProcess',
            'preserveGlobalState',
            'example',
            'param',
            'return',
            'throws',
            'since',
            'deprecated',
            'see',
            'link',
        ],
    ],
    'phpdoc_scalar'     => true,
    'phpdoc_separation' => [
        'groups' => [
            ['runInSeparateProcess', 'preserveGlobalState'],
            ['example'],
            ['param'],
            ['return'],
            ['throws'],
            ['since'],
            ['deprecated', 'see'],
            ['link'],
        ],
    ],
    'phpdoc_single_line_var_spacing'                => true,
    'phpdoc_trim'                                   => true,
    'phpdoc_trim_consecutive_blank_line_separation' => true,
    'phpdoc_types'                                  => true,
    'phpdoc_var_annotation_correct_order'           => true,
    'phpdoc_var_without_name'                       => true,
    'return_type_declaration'                       => [
        'space_before' => 'none',
    ],
    'self_static_accessor'      => true,
    'single_blank_line_at_eof'  => true,
    'single_line_comment_style' => [
        'comment_types' => [
            'hash',
        ],
    ],
    'single_quote'                  => true,
    'single_space_around_construct' => true,
    'space_after_semicolon'         => true,
    'standardize_not_equals'        => true,
    'trailing_comma_in_multiline'   => [
        'elements' => [
            'arrays',
            'match',
        ],
    ],
    'trim_array_spaces'       => true,
    'type_declaration_spaces' => true,
    'types_spaces'            => true,
    'unary_operator_spaces'   => true,
    'visibility_required'     => [
        'elements' => [
            'const',
            'method',
            'property',
        ],
    ],
    'whitespace_after_comma_in_array' => true,
];

return (new PhpCsFixer\Config())
    ->setRules($rules)
    ->setIndent('    ')
    ->setLineEnding("\n")
    ->setCacheFile(__DIR__ . '.build/.php-cs-fixer.cache')
    ->setFinder(PhpCsFixer\Finder::create()->in($dirs)->append([__FILE__]));
