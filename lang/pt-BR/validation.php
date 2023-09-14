<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */
    'accepted' => 'O campo :attribute deve ser aceito.',
    'active_url' => 'O campo :attribute não é uma URL válida.',
    'after' => 'O campo :attribute deve conter uma data posterior a :date.',
    'after_or_equal' => 'O campo :attribute deve conter uma data posterior ou igual a :date.',
    'alpha' => 'O campo :attribute deve conter apenas letras.',
    'alpha_dash' => 'O campo :attribute deve conter apenas letras, números, traços e sublinhados.',
    'alpha_num' => 'O campo :attribute deve conter apenas letras e números.',
    'array' => 'O campo :attribute deve ser um array.',
    'barcode' => 'O campo :attribute deve conter um código de barras válido',
    'before' => 'O campo :attribute deve conter uma data anterior a :date.',
    'before_or_equal' => 'O campo :attribute deve conter uma data posterior ou igual a :date.',
    'between' => [
        'numeric' => 'O campo :attribute deve conter um número entre :min e :max.',
        'file' => 'O campo :attribute deve conter um arquivo com tamanho entre :min e :max kilobytes.',
        'string' => 'O campo :attribute deve conter entre :min e :max caracteres.',
        'array' => 'O campo :attribute deve conter entre :min e :max itens.',
    ],
    'boolean' => 'O campo :attribute deve conter um valor booleano (true ou false).',
    'cnpj' => 'O campo :attribute deve conter um CNPJ válido',
    'confirmed' => 'O campo :attribute não é correspondente.',
    'cpf' => 'O campo :attribute deve conter um CPF válido',
    'cpfcnpj' => 'O campo :attribute deve conter um CPF ou CNPJ válido',
    'date' => 'O campo :attribute deve conter uma data válida.',
    'date_equals' => 'O campo :attribute deve conter uma data válida igual a :date.',
    'date_format' => 'O campo :attribute deve conter uma data no formato :format.',
    'different' => 'O campo :attribute e :other devem ser diferentes.',
    'digits' => 'O campo :attribute deve ter :digits dígitos.',
    'digits_between' => 'O campo :attribute deve ter entre :min e :max dígitos.',
    'dimensions' => 'O campo :attribute possui dimensões de imagem inválidas.',
    'distinct' => 'O campo :attribute possui um valor duplicado.',
    'email' => 'O campo :attribute deve ser um endereço de e-mail válido.',
    'ends_with' => 'O campo :attribute deve terminar com um dos seguintes valores: :values.',
    'exists' => 'O campo :attribute deve possuir um registro válido.',
    'file' => 'O campo :attribute deve conter um arquivo.',
    'filled' => 'O campo :attribute deve conter algum valor.',
    'gt' => [
        'numeric' => 'O campo :attribute deve ser maior que :value.',
        'file' => 'O campo :attribute de conter um arquivo com mais de :value kilobytes.',
        'string' => 'O campo :attribute deve conter mais de :value caracteres.',
        'array' => 'O campo :attribute deve conter mais de :value itens.',
    ],
    'gte' => [
        'numeric' => 'O campo :attribute deve ser maior ou igual a :value.',
        'file' => 'O campo :attribute deve conter um arquivo com pelo menos :value kilobytes.',
        'string' => 'O campo :attribute deve conter :value caracteres ou mais.',
        'array' => 'O campo :attribute deve conter :value itens ou mais.',
    ],
    'image' => 'O campo :attribute deve conter uma imagem.',
    'in' => 'O campo :attribute aceita apenas os valores :values.',
    'in_array' => 'O campo :attribute deve possuir um valor entre os seguintes :other.',
    'integer' => 'O campo :attribute deve ser um número inteiro.',
    'ip' => 'O campo :attribute deve ser um endereço IP válido.',
    'ipv4' => 'O campo :attribute deve ser um endereço IPv4 válido.',
    'ipv6' => 'O campo :attribute deve ser um endereço IPv6 válido.',
    'json' => 'O campo :attribute deve ser uma string JSON válida.',
    'lt' => [
        'numeric' => 'O campo :attribute deve ser menor que :value.',
        'file' => 'O campo :attribute de conter um arquivo com menos de :value kilobytes.',
        'string' => 'O campo :attribute deve conter menos de :value caracteres.',
        'array' => 'O campo :attribute deve conter menos de :value itens.',
    ],
    'lte' => [
        'numeric' => 'O campo :attribute deve ser menor ou igual a :value.',
        'file' => 'O campo :attribute deve conter um arquivo com no máximo :value kilobytes.',
        'string' => 'O campo :attribute deve conter :value caracteres ou menos.',
        'array' => 'O campo :attribute deve conter :value itens ou menos.',
    ],
    'max' => [
        'numeric' => 'O campo :attribute não deve ser maior que :max.',
        'file' => 'O campo :attribute deve conter um arquivo com no máximo :max kilobytes.',
        'string' => 'O campo :attribute pode ter no máximo :max caracteres.',
        'array' => 'O campo :attribute pode ter no máximo :max itens.',
    ],
    'mimes' => 'O campo :attribute aceita apenas aquivos dos seguintes tipos: :values.',
    'mimetypes' => 'O campo :attribute aceita apenas aquivos dos seguintes tipos: :values.',
    'min' => [
        'numeric' => 'O campo :attribute não deve ser menor que :min.',
        'file' => 'O campo :attribute deve conter um arquivo com no mínimo :min kilobytes.',
        'string' => 'O campo :attribute deve ter pelo menos :min caracteres.',
        'array' => 'O campo :attribute deve ter no mínimo :min itens.',
    ],
    'multiple_of' => 'O campo :attribute deve ser múltiplo de :value.',
    'not_in' => 'O campo :attribute não pode estar entre :values.',
    'not_regex' => 'O campo :attribute deve atender a regra :value.',
    'numeric' => 'O campo :attribute deve ser um valor numérico.',
    'password' => 'O campo :attribute deve conter uma senha válida.',
    'present' => 'O campo :attribute deve estar presente na requisição.',
    'regex' => 'O campo :attribute não deve atender a regra :value.',
    'required' => 'O campo :attribute é obrigatório.',
    'required_if' => 'O campo :attribute é obrigatório quando :other é igual a :value.',
    'required_unless' => 'O campo :attribute é obrigatório a menos que :other seja igual a :values.',
    'required_with' => 'O campo :attribute é obrigatório quando um dos valores :values está presente.',
    'required_with_all' => 'O campo :attribute é obrigatório quando os valores :values estão presentes.',
    'required_without' => 'O campo :attribute é obrigatório quando um dos valores :values não está presente.',
    'required_without_all' => 'O campo :attribute é obrigatório quando nenhum dos valores :values está presente.',
    'prohibited' => 'O campo :attribute não deve ser passado.',
    'prohibited_if' => 'O campo :attribute não deve ser passado quando :other é igual a :value.',
    'prohibited_unless' => 'O campo :attribute não deve ser passado a menos que :other seja igual a :values.',
    'same' => 'O campo :attribute deve ser igual ao campo :other.',
    'size' => [
        'numeric' => 'O campo :attribute deve ser igual a :size.',
        'file' => 'O campo :attribute deve conter um arquivo com :size kilobytes.',
        'string' => 'O campo :attribute deve ter :size caracteres.',
        'array' => 'O campo :attribute deve conter :size itens.',
    ],
    'starts_with' => 'O campo :attribute deve começar com um dos seguintes valores: :values.',
    'string' => 'O campo :attribute deve ser uma string.',
    'timezone' => 'O campo :attribute deve ser um timezone válido.',
    'unique' => 'O campo :attribute deve conter um valor único.',
    'uploaded' => 'O campo :attribute falhou ao carregar.',
    'url' => 'O campo :attribute deve conter uma URL no formato válido.',
    'uuid' => 'O campo :attribute deve ser um UUID válido.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [
        'user.email' => "'E-mail'",
        'user.name' => "'Nome completo'",
        'address.zipcode' => "'CEP'",
        'address.address' => "'Nome da Rua'",
        'address.number' => "'Número'",
        'address.complement' => "'Complemento'",
        'address.district' => "'Bairro'",
        'address.city' => "'Cidade'",
        'address.state' => "'Estado'"
    ],

];
