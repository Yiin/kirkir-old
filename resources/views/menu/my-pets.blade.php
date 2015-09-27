<div class="main ui container">
  <div class="ui cards">
    @foreach (Auth::user()->pets as $pet)
      <div class="card">
        <div class="image">
          <img src="http://lorempixel.com/300/300/cats/{{ $pet->id }}">
        </div>
        <div class="content">
          <div class="header">{{ $pet->name }}</div>
          <div class="meta">
            <a>{{ $pet->breed->getName() }}</a>
          </div>
          <div class="description">
            
          </div>
        </div>
        <div class="extra content">
          <span class="right floated">
            {{ $pet->country }}
          </span>
          <span>
            <i class="user icon"></i>
            {{ $pet->type->getName() }}
          </span>
          <div class="ui two buttons">
            <button class="negative ui button remove-pet-btn" data-pet-id="{{ $pet->id }}">Remove</button>
          </div>
        </div>
      </div>
    @endforeach
</div>