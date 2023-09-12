<div @class([
    "flex items-center justify-between",
    "border-t border-white border-opacity-10 pt-6 text-white" => $isTotal ?? false
])>
    <dt @class([
        "text-primary-200",
        "text-base" => $isTotal ?? false
    ])>{{ $title }}</dt>
    <dd @class([
        "text-secondary-300",
        "text-base" => $isTotal ?? false
    ])>R$&nbsp;{{ $value }}</dd>
</div>
