<footer>
         <div class="container">
            <div class="row">
               <div class="col-md-4">
                   <div class="full">
                      <div class="logo_footer">
                        <a href="#"><img width="210" src="home/images/logo.png" alt="#" /></a>
                      </div>
                      <div class="information_f">
                        <p><strong>ADDRESS:</strong> Main Road, Bandarawela, Sri Lanka</p>
                        <p><strong>TELEPHONE:</strong> +94 1234567890</p>
                        <p><strong>EMAIL:</strong> cyberstore@gmail.com</p>
                      </div>
                   </div>
               </div>
               <div class="col-md-8">
                  <div class="row">
                  <div class="col-md-7">
                     <div class="row">
                        <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Menu</h3>
                        <ul>
                           <li><a href="{{url('/')}}">Home</a></li>
                           <li><a href="{{url('about')}}">About</a></li>
                           <li><a href="{{url('contact')}}">Contact</a></li>
                           <li><a href="{{url('products')}}">Products</a></li>
                           <li><a href="{{url('show_cart')}}">Cart</a></li>
                           <li><a href="{{url('show_order')}}">Orders</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="widget_menu">
                        <h3>Account</h3>
                        <ul>
                           <li><a href="#">Account</a></li>
                           <li><a href="#">Checkout</a></li>
                           <li><a href="{{ route('login') }}">Login</a></li>
                           <li><a href="{{ route('register') }}">Register</a></li>
                           <li><a href="{{url('products')}}">Shopping</a></li>
                           <li><a href="#">Widget</a></li>
                        </ul>
                     </div>
                  </div>
                     </div>
                  </div>     
                  <div class="col-md-5">
                     <div class="widget_menu">
                        <h3>Newsletter</h3>
                        <div class="information_f">
                          <p>Subscribe by our newsletter and get update protidin.</p>
                        </div>
                        <div class="form_sub">
                        <form action="{{url('/subscribe')}}" method="POST">
                              <fieldset>
                                 <div class="field">
                                    <input type="email" placeholder="Enter Your Mail" name="email" required />
                                    <input type="submit" name="submit" value="Subscribe" />
                                 </div>
                              </fieldset>
                           </form>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>