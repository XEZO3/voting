@props(['compet'=>[]])
<style>
 
  
</style>
<div class="row justify-content-center">
    <div class="card mb-3 px-3 pt-3" style="width:70%;border:none;border-radius:15px ">
      
        <iframe  class="card-img-top" height="315" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen
        src="{{$compet['url']}}">
    </iframe>
    {{-- <video class="card-img-top" style="max-height: 500px">
     <source src="{{$compet['url']}}">
    </video> --}}
    <div class="card-body">
      <div class="cont" style="display:flex;flex-direction:row;justify-content:space-between">
        <div class="name">
          <h5 class="card-title">{{$compet['name']}}</h5>
        </div>
        <div class="votes" style="background: #5C385A;border-radius:10px">
          <div class="vote px-5" id="vote{{$compet['id']}}" style="color:white;font-size:22px;padding:10px;">{{$compet['votes']}}</div>
        </div>
      </div>
      
      {{-- <p class="card-text"><small class="text-muted">عدد الاصوات: {{$compet['votes']}}</small></p> --}}
      <button type="button" class="btn unvote-btn" hidden id="unvote-btn{{$compet['id']}}"  style="background: #5C385A;color:white" data-vote-id="{{ $compet['id'] }}" >اللغاء التصويت</button>
      <button type="button" class="btn vote-btn" id="vote-btn{{$compet['id']}}"  style="background: #5C385A;color:white" data-vote-id="{{ $compet['id'] }}" >تصويت</button>
    </div>
      
      </div>
</div>