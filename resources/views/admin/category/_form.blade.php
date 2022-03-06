<div class="row">
    <div class="form-group col-6">
        <label class="col-form-label">Meta titulo</label>
        <div>
            <input class="form-control @error('meta_title') is-invalid @enderror" type="text" 
            name="meta_title"
            title="meta_title"
            value="{{$category->meta_title}}"
            required
            >
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
            value="{{$category->title}}"
            required
            >
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-6">
        <label class="col-form-label">Meta descripción</label>
        <div>
            <textarea class="form-control @error('meta_description') is-invalid @enderror" 
            name="meta_description" 
            id="meta_description" 
            rows="3"
            >{{$category->meta_description}}</textarea>
            @error('meta_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="form-group col-6">
        <label class="col-form-label">Descripción</label>
        <div>
            <textarea class="form-control @error('description') is-invalid @enderror" 
            name="description" 
            id="description" 
            rows="3"
            >{{$category->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-6">
        <label class="col-form-label">Categoría superior</label>
        <div>
            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id" id="parent_id">
                <option value="">Ninguno</option>
                @foreach ($all_categories as $all_category)
                    <option value="{{$all_category->id}}"

                        {{old('parent_id', $category->parent_id) == $all_category->id ? 'selected' : ''}}
                        
                        >{{$all_category->title}}</option>
                @endforeach
            </select>
            @error('parent_id')
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

            <span class="help">Se recomienda usar imágenes de 700 x 430 pixeles.</span>

            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="form-group col-12">
        <label class="col-form-label">Icono</label>
        <div>
            <input class="form-control @error('icon') is-invalid @enderror" type="text" 
            name="icon"
            title="icon"
            value="{{$category->icon}}"
            required
            >

            <span class="help">Se debe de usar <a href="https://fontawesome.com/v4.7/icons/" target="_blak">Font Awesome 4.7.0</a>  fa "nombre"</span>

            @error('icon')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

    </div>

    <div class="col-12">
        <button type="submit" class="btn">Guardar cambios</button>
        <a href="{{route('categories.index')}}" class="btn-secondry">Cancelar</a>
    </div>
</div>