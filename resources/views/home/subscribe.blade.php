<section class="subscribe_section">
         <div class="container-fuild">
            <div class="box">
               <div class="row">
                  <div class="col-md-6 offset-md-3">
                     <div class="subscribe_form ">
                        <div class="heading_container heading_center">
                           <h3>Subscribe To Get Discount Offers</h3>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                        <form action="{{url('/subscribe')}}" method="POST">
                           @csrf
                           <input type="email" name="email" placeholder="Enter your email">
                           <button type="submit" name="submit">SUBSCRIBE</button>                   
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>