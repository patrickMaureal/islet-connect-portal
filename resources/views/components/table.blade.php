@props(['id'])

<table id="{{ $id }}" {{ $attributes->merge(['class' => 'display responsive nowrap shadow table compact table-striped row-border']) }}>
  {{ $slot }}
</table>
