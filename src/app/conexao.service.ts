import { Injectable, EventEmitter } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ConexaoService {

  public pedidosEmmiter = new EventEmitter();

  private urlHost = 'http://localhost:3000';

  constructor(private http: HttpClient ) { }

  public getAll(){
    return this.http.get(`${this.urlHost}/pedidos`).toPromise().then( (resposta: any ) =>  resposta );
  }

  public getNome(nome:string){
    return this.http.get(`${this.urlHost}/pedidos/cliente.name_like=${nome}`)
  }

  public getMinValue(value:string){
    return this.http.get(`${this.urlHost}/pedidos?value_gte=${value}`).toPromise()
    .then( (resposta:any) => {console.log(resposta); resposta} );
  }

}
