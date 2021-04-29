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

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'Поля не совпадают.',
    'date' => 'Некорректная дата.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'Число должно содержать не менее :min и не более :max цифр.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'У переданного значения есть дубликаты.',
    'email' => 'Некорректный адрес электронной почты.',
    'ends_with' => 'Поле должно заканчиваться на одно из следующих значений: :values.',
    'exists' => 'Вы задержаны за ввод несуществующей информации.',
    'file' => 'Поле :attribute должно быть файлом.',
    'filled' => 'Поле должно быть заполнено.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'Файл должен быть картинкой.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'Поле должно содержать целое число.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'Максимальное значение числа: :max.',
        'file' => 'Максимальный размер файла: :max KB.',
        'string' => 'Максимальная длина: :max символов.',
        'array' => 'Максимальный размер массива: :max элементов.',
    ],
    'mimes' => 'Поле :attribute должно быть файлом со следующими типами: :values.',
    'mimetypes' => 'Расширение файла должно быть одним из них: :values.',
    'min' => [
        'numeric' => 'Минимальное значение числа: :min.',
        'file' => 'Минимальный размер файла: :min KB.',
        'string' => 'Минимальная длина: :min символов.',
        'array' => 'Минимальный размер массива: :min элементов.',
    ],
    'multiple_of' => 'The :attribute must be a multiple of :value',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'Поле должно содержать число.',
    'phone' => 'Поле должно содержать валидный номер телефона.',
    'password' => 'Пароль указан неверно.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'Неверный формат поля.',
    'required' => 'Поле обязательно к заполнению.',
    'required_if' => 'Поле обязательно к заполнению, когда :other равен :value.',
    'required_unless' => 'Поле обязательно к заполнению, когда :other не равен :values.',
    'required_with' => 'Поле обязательно к заполнению, когда :values указан.',
    'required_with_all' => 'Поле обязательно к заполнению, когда :values указаны.',
    'required_without' => 'Поле обязательно к заполнению, когда :values не указан.',
    'required_without_all' => 'Поле обязательно к заполнению, когда :values не указаны.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'Файл должен весить :size KB.',
        'string' => 'Строка должна содержать :size символов.',
        'array' => 'Массив должен содержать :size элементов.',
    ],
    'starts_with' => 'Поле должно начинаться с одного из следующих значений: :values.',
    'string' => 'Поле должно быть строкой.',
    'timezone' => 'Поле должно быть валидной временной зоной.',
    'unique' => ':attribute уже существует.',
    'uploaded' => 'Ошибка при загрузке файла.',
    'url' => 'Неправильный формат ссылки.',
    'uuid' => 'Это поле должно содержать корректный UUID.',

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

    'attributes' => [],

];
