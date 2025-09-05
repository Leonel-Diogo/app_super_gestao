{{$slot}}
<form action={{route('site.contato')}} method="post">
    @csrf{{--CRIA UM INPUT ESCONDIDO PARA O TOKEN--}}
    <input type="text" name="name" value="{{old('name')}}" placeholder="Nome" class="{{$classe}}">
    @if ($errors->has('name'))
        {{$errors->first('name')}}
    @endif
    <br>
    <input type="text" name="phone" value="{{old('phone')}}" placeholder="Telefone" class="{{$classe}}">
    {{$errors->has('phone') ? $errors->first('phone') : ''}}
    <br>
    <input type="text" name="email" value="{{old('email')}}" placeholder="E-mail" class="{{$classe}}">
    {{$errors->has('email') ? $errors->first('email') : ''}}
    <br>
    <select name="contact_reason_id" class="{{$classe}}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($contact_reason as $key => $contact)
            <option value="{{$contact->id}}" {{old('contact_reason_id') == $contact->id ? 'selected' : ''}}>
                {{$contact->contact_reason}}
            </option>
        @endforeach
    </select>
    {{$errors->has('contact_reason_id') ? $errors->first('contact_reason_id') : ''}}
    <br>
    <textarea name="message" class="{{$classe}}">
        {{(old('message') != '') ? old('message') : 'Preencha aqui a sua mensagem'}}
    </textarea>
    {{$errors->has('message') ? $errors->first('message') : ''}}
    <br>
    <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>
@if ($errors->any())
    <div style="background: red; position: absolute; left: 0px; top: 0px; width: 50%;">
        @foreach ($errors->all() as $error)
            {{ $error}}
            <br>
        @endforeach
    </div>
@endif