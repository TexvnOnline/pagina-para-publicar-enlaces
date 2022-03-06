<div class="row">
    <div class="form-group col-6">
        <label class="col-form-label">Meta titulo</label>
        <div>
            <input class="form-control @error('meta_title') is-invalid @enderror" type="text" 
            name="meta_title"
            title="meta_title"
            value="{{old('meta_title', $post->meta_title)}}"
            required
            >
            <span class="help">Este título es para que los buscadores puedan encontrar tu enlace (Se recomienda usar palabras clave).</span>
            @error('meta_title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-6">
        <label class="col-form-label">titulo</label>
        <div>
            <input class="form-control @error('title') is-invalid @enderror" type="text" 
            name="title"
            title="title"
            value="{{old('title', $post->title)}}"
            required
            >
            <span class="help">(Se recomienda usar palabras clave y de 50 a 60 caracteres).</span>
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-12">
        <label class="col-form-label">Meta descripción</label>
        <div>
            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
            name="meta_description" 
            id="meta_description" 
            rows="3"
            >{{old('meta_description', $post->meta_description)}}</textarea>
            <span class="help">Esta descripción se mostrar en los resultados de búsqueda en los navegadores (Se recomienda usar palabras clave y de 140 a 160 caracteres).</span>
            @error('meta_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-12">
        <label class="col-form-label">Descripción</label>
        <div>
            <textarea class="form-control summernote @error('description') is-invalid @enderror" 
            name="description" 
            id="description" 
            rows="3"
            >{{old('description', $post->description)}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-8">
        <label class="col-form-label">Categoría (*)</label>
        <div>
            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id" required>
                <option></option>
                @foreach ($categories as $item)
                <option value="{{$item->id}}"
                {{old('category_id', $post->category_id) == $item->id ? 'selected' : ''}}
                    >{{$item->title}}</option>
                @endforeach
            </select>
            @error('category_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-4">
        <label class="col-form-label">Imagen de portada</label>
        <div>
            <div class="custom-file">
                <input type="file" name="file" id="file" 
                
                class="custom-file-input @error('file') is-invalid @enderror" id="customFile" lang="es">
                <label class="custom-file-label" for="customFile">Seleccionar Archivo</label>
            </div>

            <span class="help">Se recomienda usar imágenes de 700 x 420 pixeles.</span>

            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-12">
        <label class="col-form-label">Enlace</label>
        <div>
            <input class="form-control @error('link') is-invalid @enderror" 
            type="url"
            name="link"
            title="link"
            value="{{old('link', $post->link)}}"
            required
            >
            @error('link')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col-12 m-t20">
        <div class="ml-auto">
            <h3 class="m-form__section">Tiempo de duración del enlace</h3>
        </div>
    </div>

    <div class="form-group col-6">
        <label class="col-form-label">Fecha de caducidad del enlace</label>
        <div>
            <input class="form-control datepicker @error('deadline') is-invalid @enderror" 
            type="date" 
            id="deadline" 
            name="deadline"

            @if ($post->deadline == null)
            data-value="{{$post->deadline}}"
            @else
            data-value="{{$post->deadline->format('Y-m-d')}}"
            @endif

            required
            >
            <span class="help">En este campo puedes ingresar la fecha hasta la cual el enlace está disponible.</span>
            @error('deadline')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-6">
        <label class="col-form-label">Hora de caducidad del enlace</label>
        <div>
            <input class="form-control timepicker @error('end_time') is-invalid @enderror" 
            type="time" 
            id="end_time" 
            name="end_time"

            @if ($post->deadline == null)
            data-value="{{$post->deadline}}"
            @else
            data-value="{{$post->deadline->format('H:i')}}"
            @endif

            required
            >
            <span class="help">En este campo puedes ingresar la fecha hasta la cual el enlace está disponible.</span>
            @error('end_time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>


    <div class="form-group col-12">
        <label class="col-form-label">Etiquetas</label>
        <div>
            <input class="form-control @error('tags') is-invalid @enderror" 
            type="text" 
            id="tags" 
            name="tags"
            data-role="tagsinput"
            value="{{$tags}}"
            required
            >
            <span class="help">Escribe las etiquetas separadas por comas (,)</span>
            @error('tags')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>



    <div class="col-12">
        <button type="submit" class="btn">Guardar cambios</button>
        <a href="{{route('posts.index')}}" class="btn-secondry">Cancelar</a>
    </div>
</div>
@push('styles')
{!! Html::style('pickadate/themes/default.css') !!}
{!! Html::style('pickadate/themes/default.date.css') !!}
{!! Html::style('pickadate/themes/default.time.css') !!}

{!! Html::style('summernote/summernote.min.css') !!}

{{--  {!! Html::style('select2/css/select2.css') !!}  --}}

{!! Html::style('select2/css/select2.css') !!}
{!! Html::style('select2/css/select2-bootstrap.min.css') !!}

{!! Html::style('tag_input/tagsinput.css') !!}
@endpush
@push('scripts')
{!! Html::script('pickadate/picker.js') !!}
{!! Html::script('pickadate/picker.date.js') !!}
{!! Html::script('pickadate/picker.time.js') !!}
{!! Html::script('pickadate/legacy.js') !!}

{!! Html::script('pickadate/translations/es_ES.js') !!}

{!! Html::script('select2/js/select2.js') !!}

{!! Html::script('tag_input/tagsinput.js') !!}
<script>

</script>
<script>
    $('.datepicker').pickadate({
        min: true,
        formatSubmit: 'yyyy-m-d'
    });
    $('.timepicker').pickatime({
        formatSubmit: 'HH:i'
    });
</script>
{!! Html::script('summernote/summernote.min.js') !!}
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 210
        });
      });
</script>
<script>
    $("#category_id").select2({
        theme: "bootstrap",
        placeholder: "Selecciona categoría",
        allowClear: true
    });
</script>
@endpush