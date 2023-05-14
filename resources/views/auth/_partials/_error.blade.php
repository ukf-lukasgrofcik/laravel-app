@if( $errors->has($column) )
    <div class="invalid-feedback">
        {{ $errors->first($column) }}
    </div>
@endif
