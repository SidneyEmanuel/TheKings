import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import 'rxjs/add/operator/map'; 

/*
  Generated class for the ServicosProvider provider.

  See https://angular.io/guide/dependency-injection for more info on providers
  and Angular DI.
*/
@Injectable()
export class ServicosProvider {

  //api local
 api: string = 'http://localhost/tcc/api/conexao_com_include/';

 //api hospedada
//   api: string = 'http://appmysql-cc.umbler.net/';

  constructor(public http: Http) {


  }


   listarDados(){
    return this.http.get(this.api + 'listar.php').map(res=>res.json())
  }


  cadastrar(parans) {
    let headers = new Headers({ 'Content-Type' : 'application/x-www-form-urlencoded' });
    return this.http.post(this.api + "apiCadastro.php", parans, {
          headers:headers,
          method:"POST"
    }).map(
          (res:Response) => {return res.json();}
    );
}

logar(parans) {
      let headers = new Headers({ 'Content-Type' : 'application/x-www-form-urlencoded' });
      return this.http.post(this.api + "apilogin.php", parans, {
            headers:headers,
            method:"POST"
      }).map(
            (res:Response) => {return res.json();}
      );
  }

excluir(id){
    let headers = new Headers({ 'Content-Type' : 'application/x-www-form-urlencoded' });
    return this.http.post(this.api + "apiDeleta.php", id, {
          headers:headers
          }).map(
          (res:Response) => {return res.json();}
    );
}
editar(data) {
    let headers = new Headers({ 'Content-Type' : 'application/x-www-form-urlencoded' });
    return this.http.post(this.api + "apiUpdate.php", data, {
          headers:headers,
          method:"POST"
    }).map(
          (res:Response) => {return res.json();}
    );
}

}
