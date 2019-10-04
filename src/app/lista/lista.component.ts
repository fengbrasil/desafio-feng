import { Component, OnInit } from '@angular/core';
import { ConexaoService } from '../conexao.service';

@Component({
  selector: 'app-lista',
  templateUrl: './lista.component.html',
  styleUrls: ['./lista.component.scss']
})
export class ListaComponent implements OnInit {

  public pedidos:any;

  constructor(private service: ConexaoService) { }

  ngOnInit() { 
    this.service.getAll().then( (res) => {
      this.pedidos = res;
    });    
    this.service.pedidosEmmiter.subscribe((val) => {
      this.pedidos = val;
    })
  }




}
