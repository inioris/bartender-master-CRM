
                            <div class="col s12 m6">
                                <div class="card z-depth-4" style="border-radius: 5px;">
                                <div class="card-image waves-effect waves-block waves-light">
                                  
                                  <img class="responsive-img z-depth-4" src="{{ url($recetas->imagen) }}" style="height: 360px; width:560px;">
                                </div>
                                <div class="card-reveal">
                                  <span class="card-title grey-text text-darken-4">{{ $recetas->title }}<i class="material-icons right">close</i></span>
                                  <p>{{ $recetas->description }}</p>
                                </div>
                              </div>
                            </div>