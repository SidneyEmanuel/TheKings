import { Component } from '@angular/core';
import { NavController, AlertController } from 'ionic-angular';
import { ServicosProvider } from '../../providers/servicos/servicos';
import { FormBuilder, Validators } from '@angular/forms';


@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {
  appCtrl: any;
  users: any[];
  cadastro: any = {};
  nomes: boolean = true;
  
  constructor(public navCtrl: NavController,
    public servicos: ServicosProvider,
    public alertCtrl: AlertController,
    public formBuilder: FormBuilder) {;
      this.buscarDados();
      this.cadastro = this.formBuilder.group({
        id:['', Validators.required],
        observacao:['', Validators.required],
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
  

}



