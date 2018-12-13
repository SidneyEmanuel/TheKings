import { Component } from '@angular/core';
import { NavController, AlertController } from 'ionic-angular';
import { ServicosProvider } from '../../providers/servicos/servicos';
import { FormBuilder, Validators } from '@angular/forms';
import { HomePage } from '../home/home';


@Component({
  selector: 'page-contact',
  templateUrl: 'contact.html'
})
export class ContactPage {
  login: any = {};
  appCtrl: any;
  logar: string;
  users: any[];
  cadastro: any = {};
  nomes: boolean = true;

  
  constructor(public navCtrl: NavController,
    public servicos: ServicosProvider,
    public alertCtrl: AlertController,
    public formBuilder: FormBuilder
  ) {
    this.logar = "Logar";
    this.buscarDados();
    this.cadastro = this.formBuilder.group({
      nome:['', Validators.required],
      email:['', Validators.required],
      senha:['', Validators.required],
      endereco:['', Validators.required],
    });

    this.login = this.formBuilder.group({
      email:['', Validators.required],
      senha:['', Validators.required],
    });
  }

  buscarDados(){
    //retornar dados do banco mysql
    this.servicos.listarDados()
    .subscribe(
      data=> this.users = data,
      err=> console.log(err)
    );
    
    
  }

  pushPage() {
    this.navCtrl.push(HomePage);
}


  postDados() {
    this.servicos.cadastrar(this.cadastro.value)
          .subscribe(
                data=>{console.log(data.mensage);
                      this.buscarDados();      
                },
                err=>console.log(err)
          );
}

  loginDados() {
    this.servicos.logar(this.login.value)
          .subscribe(
                data=>{console.log(data.mensage);
                      this.buscarDados();      
                },
                err=>console.log(err)
          );
  }



}
