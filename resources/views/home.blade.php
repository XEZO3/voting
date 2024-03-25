@extends('_layout')
@section('content')
<div class="container-md mt-3" dir="rtl">
    @foreach ($items as $item)
    <x-card :compet="$item"></x-card>
    @endforeach
    
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fingerprintjs2/2.1.0/fingerprint2.min.js"></script>

<script>
    function disable(){
        var buttons = document.querySelectorAll('.vote-btn');
        var savedId = localStorage.getItem('csrtid');

        // Loop through each button and disable it
        buttons.forEach(function(button) {
            if(button.id === "vote-btn"+savedId){
                button.hidden = true ;
                document.getElementById("unvote-btn"+savedId).hidden = false
            }else{            
                button.disabled = true;
            }
        });
    }
    $(document).ready(function() {
        if(localStorage.getItem('csrt')){
              disable();
            }     
        const fpPromise = import('https://openfpcdn.io/fingerprintjs/v4').then(FingerprintJS => FingerprintJS.load())
        $('.vote-btn').click(function(e) {
            e.preventDefault();
            var voteId = $(this).data('vote-id');
            if(localStorage.getItem("csrt")){
                
                alert("لقد قمت بالتصويت من قبل")
                return;
            }
            
           
                
            $.ajax({
                url: "{{ route('vote') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    vote_id: voteId,
                },
                success: function(response) {
                    if(response.success == false){      
                        alert("لقد قمت بالتصويت من قبل")
                        localStorage.setItem("csrtid",response.voteid)
                    }else{
                   
                    localStorage.setItem("csrtid",voteId)
                    }
                    localStorage.setItem("csrt","true")
                    location.reload();

                },
                error: function(xhr, status, error) {
                    console.log(result.visitorId)
                   alert("حدث خطا الرجاء المحاولة لاحقا")
                }
            });
                
        });
        $('.unvote-btn').click(function(e) {
            e.preventDefault();
            var voteId = $(this).data('vote-id');
            if(!localStorage.getItem("csrt")){
                
                alert("لم تقم بالتصويت بعد")
                return;
            }
            
           
                
            $.ajax({
                url: "{{ route('unvote') }}",
                method: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    vote_id: voteId,
                },
                success: function(response) {
                    if(response.success == false){    
                        alert("لم تقم بالتصويت لالغائه")
                    }
                    localStorage.removeItem("csrt")
                    localStorage.removeItem("csrtid")
                    location.reload();

                },
                error: function(xhr, status, error) {
                    console.log(result.visitorId)
                   alert("حدث خطا الرجاء المحاولة لاحقا")
                }
            });
        });
    });
</script>
@endsection