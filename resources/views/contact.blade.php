@extends('layouts.app')

@section('title', 'Contato')

@section('content')
    <div class="container mt-5">
    @include('flash::message')
        <div class="row">
        
            <div class="col-md-6">
                <h3>Diga Olá !</h3>
                <h6 class="mb-4 text-secondary">Quero saber mais sobre você !</h6>

                <form action="{{ url('contact/comment') }}" method="POST">
                    @csrf
                    <input class="input" name="name" type="text" placeholder="Nome" required>
                    <input class="input" name="email" type="text" placeholder="E-mail" required>
                    <textarea class="input textarea" name="message" placeholder="Mensagem" required></textarea>
                    <button type="submit" class="btn bg-orange pr-3 pl-3">Enviar</button>
                </form>
            </div>

            <div class="col-md-5 mx-auto">
                <h3>Contato</h3>
                
                <p class="text-secondary">
                    77 Baker Street <br>
                    Parque dos Príncipes 87654 <br>
                    França
                </p>

                <p class="text-secondary">
                    Telefone: (85) 98583-9700
                </p>

                <p class="text-secondary">
                    Estamos abertos de Segunda - Sexta <br>
                    08:00 - 17:00
                </p>

                <h3>Siga-nos</h3>   
                <strong>
                    <a target="_blank" href="https://www.facebook.com/pages/Professora-Luiza-de-Teodoro-Vieira-EEEP/981208075246153" class="text-secondary mr-4">Facebook</a>
                    <a target="_blank" href="https://www.instagram.com/eeep_ltvgremio/?hl=pt-br" class="text-secondary mr-4">Instagram</a>
                    <a target="_blank" href="https://www.linkedin.com/in/vin%C3%ADcius-moreira-83930319b/?challengeId=AQGsGtZjcR_59AAAAXMImM-deWzwonCSfZb_8GNaGFpe1G5sTSxz6b6fy6sb2w8oUE8ctDK0Dgj3QOOvthp_7ZTWaEmxUkjTFA&submissionId=d73b7ba4-ed85-1d16-21f0-001a3c21c73cg" class="text-secondary mr-4">Linkedin</a>
                </strong>

            </div>
        </div>
    </div>

@endsection