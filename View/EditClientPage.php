<div class="col-md-6 col-md-offset-3">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <p>Login: <?php echo $_POST['login'] ?></p>
            <p>Numer klienta: <?php echo $_POST['client_number'] ?></p>
        </div>
        <div class="panel-body">

            <form class="form-group" data-toggle="validator" action="" method="post">
                <label for="firstname">Imię</label>
                <input type="text" 
                       class="form-control" 
                       id="firstname"
                       name="firstname"
                       placeholder="Imię"
                       value="<?php echo $_POST['firstname'] ?>">
                <label for="lastname">Nazwisko</label>
                <input type="text" 
                       class="form-control" 
                       id="lastname" 
                       name="lastname"
                       placeholder="Nazwisko"
                       value="<?php echo $_POST['lastname'] ?>">
                <label for="street">Ulica</label>
                <input type="text" 
                       class="form-control" 
                       id="street" 
                       name="street"
                       placeholder="Ulica"
                       value="<?php echo $_POST['street'] ?>">
                <label for="zipcode">Kod pocztowy</label>
                <input type="text" 
                       class="form-control" 
                       id="zipcode" 
                       name="zipcode"
                       placeholder="Kod pocztowy"
                       value="<?php echo $_POST['zipcode'] ?>">
                <label for="city">Miasto</label>
                <input type="text" 
                       class="form-control" 
                       id="city" 
                       name="city"
                       placeholder="Miasto"
                       value="<?php echo $_POST['city'] ?>">
                
                <label for="company">Nazwa firmy</label>
                <input type="text" 
                       class="form-control" 
                       id="company" 
                       name="company"
                       placeholder="Nazwa firmy"
                       value="<?php echo $_POST['company'] ?>">
                <label for="vat_number">NIP</label>
                <input type="text" 
                       class="form-control" 
                       id="vat_number" 
                       name="vat_number"
                       placeholder="NIP"
                       value="<?php echo $_POST['vat_number'] ?>">
                
                <label for="email">Email</label>
                <input type="email" 
                       class="form-control" 
                       id="email" 
                       name="email"
                       placeholder="Email"
                       value="<?php echo $_POST['email'] ?>"
                       required>
                <label for="phone">Telefon komórkowy</label>
                <input type="number" 
                       class="form-control" 
                       id="phone" 
                       name="phone"
                       placeholder="Telefon komórkowy"
                       value="<?php echo $_POST['phone'] ?>">

                <input hidden="true" name="login" value="<?php echo $_POST['login']; ?>">
                <input hidden="true" name="client_number" value="<?php echo $_POST['client_number']; ?>">
                <input hidden="true" name="formSave">
                <button type="submit" id="buttonSave" class="btn btn-success pull-right">Zapisz zmiany</button>
            </form>
        </div>
    </div>

</div>