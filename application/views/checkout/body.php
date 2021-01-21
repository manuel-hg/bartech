<div class="container pdtb5">
  <div class="card">
  <div class="card-body">

    <!--Grid row-->
    <div class="row">

      <!--Grid column-->
      <div class="col-lg-8 mb-4">

        <!-- Pills navs -->
        <ul class="nav md-pills nav-justified pills-primary font-weight-bold">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tabCheckoutBilling123" role="tab">Datos de Personales</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#tabCheckoutPayment123" role="tab">Pago</a>
          </li>
        </ul>

        <!-- Pills panels -->
        <div class="tab-content pt-4">

          <!--Panel 1-->
          <div class="tab-pane fade in show active" id="tabCheckoutBilling123" role="tabpanel">

            <!--Card content-->
            <form>

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-md-6 mb-4">

                  <!--firstName-->
                  <label for="firstName" class="">Nombre</label>
                  <input type="text" id="firstName" class="form-control">

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 mb-2">

                  <!--lastName-->
                  <label for="lastName" class="">Apellido</label>
                  <input type="text" id="lastName" class="form-control">

                </div>
                <!--Grid column-->

              </div>
              <!--Grid row-->
              <div class=" ">
                <div class="row">
                  <div class="col-md-6">
                     <!--address-->
                  <label for="address" class="">Dirección</label>
                  <input type="text" id="address" class="form-control mb-4">
                  </div>
                  <div class="col-md-6">
                    <!--colonia-->
                    <label for="address" class="">Código Postal</label>
                    <input type="text" id="address" class="form-control mb-4">
                    
                  </div>
                </div>
              </div>             

             

              <!--Grid row-->
              <div class="row">

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="zip">Colonia</label>
                  <input type="text" class="form-control" id="zip" placeholder="" required>
                  <div class="invalid-feedback">
                    Se requiere colonia.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-12 mb-4">

                  <label for="country">País</label>
                  <select class="custom-select d-block w-100" id="country" required>
                    <option value="">Elige...</option>
                    <option>México</option>
                    <option>Estados Unidos</option>
                  </select>
                  <div class="invalid-feedback">
                    Seleccione un país válido.
                  </div>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-4">

                  <label for="state">Estado</label>
                  <select class="custom-select d-block w-100" id="state" required>
                    <option value="">Elije...</option>
                    <option>Ciudad de México</option>
                  </select>
                  <div class="invalid-feedback">
                    Proporcione un estado válido.
                  </div>

                </div>
                <!--Grid column-->

                

              </div>
              <!--Grid row-->

              <hr>

              <div class="container jumbotron text-center bgdireccion">
                <div class="row">
                  <div class="col-md-12"><i class="fas fa-plus-circle"></i></div>
                  <div class="col-md-12"><a href="">Agregar dirección</a></div>
                </div>
              </div>

              <hr>

              <button class="btn btn-primary btn-lg btn-block" type="submit">Próximo paso</button>

            </form>

          </div>
          <!--/.Panel 1-->

          

          <!--Panel 2-->
          <div class="tab-pane fade" id="tabCheckoutPayment123" role="tabpanel">

            <div class="d-block my-3 mg5">
              <div class="mb-2">
                <input name="group2" type="radio" class="form-check-input with-gap" id="radioWithGap4" checked
                  required>
                <label class="form-check-label" for="radioWithGap4">Tarjeta de crédito</label>
              </div>
              <div class="mb-2">
                <input iname="group2" type="radio" class="form-check-input with-gap" id="radioWithGap5"
                  required>
                <label class="form-check-label" for="radioWithGap5">Tarjeta de débito</label>
              </div>
              <div class="mb-2">
                <input name="group2" type="radio" class="form-check-input with-gap" id="radioWithGap6" required>
                <label class="form-check-label" for="radioWithGap6">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name123">Nombre del titular</label>
                <input type="text" class="form-control" id="cc-name123" placeholder="" required>
                <small class="text-muted">Nombre completo como se muestra en la tarjeta</small>
                <div class="invalid-feedback">
                  Se requiere el nombre en la tarjeta
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number123">Numero de tarjeta</label>
                <input type="text" class="form-control" id="cc-number123" placeholder="(xxxx xxxx xxxx xxxx)" required>
                <div class="invalid-feedback">
                  Se requiere el número de tarjeta de crédito
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration123">Vencimiento</label>
                <input type="text" class="form-control" id="cc-expiration123" placeholder="(MM / AA)" required>
                <div class="invalid-feedback">
                  Fecha de vencimiento requerida
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-cvv123">CVV</label>
                <input type="text" class="form-control" id="cc-cvv123" placeholder="" required>
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            <hr class="mb-4">

            <button class="btn btn-primary btn-lg btn-block" type="submit">Pagar</button>

            <div class="container">
            <div class="col-md-4"> </div>
            <div class="col-md-4"> </div>
            <div class="col-md-4">
              <label for="codepromo">Codigo de promoción</label>
              <input type="text" class="form-control">
            </div>
          </div>

          </div>
          <!--/.Panel 2-->
          

        </div>
        <!-- Pills panels -->


      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-lg-4 mb-4">

        <button class="btn btn-primary btn-lg btn-block" type="submit">Realizar pedido</button>

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <div class="card-body">
            <h4 class="mb-4 mt-1 h5 text-center font-weight-bold">Resumen</h4>

            <hr>

            <dl class="row">
              <dd class="col-sm-8">
                Producto a comprar
              </dd>
              <dd class="col-sm-4">
                $ 2000
              </dd>
            </dl>

            <hr>

            <dl class="row">
              <dd class="col-sm-8">
                Producto a comprar
              </dd>
              <dd class="col-sm-4">
                $ 2000
              </dd>
            </dl>

            <hr>

            <dl class="row">
              <dd class="col-sm-8">
                Producto a comprar
              </dd>
              <dd class="col-sm-4">
                $ 2000
              </dd>
            </dl>

            <hr>

            <dl class="row">
              <dt class="col-sm-8">
                Total
              </dt>
              <dt class="col-sm-4">
                $ 2000
              </dt>
            </dl>
          </div>

        </div>
        <!--/.Card-->
      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->

  </div>
</div>
</div>