import { Component, OnInit } from '@angular/core';
import { ConexaoService } from '../conexao.service';

@Component({
  selector: 'app-filtro',
  templateUrl: './filtro.component.html',
  styleUrls: ['./filtro.component.scss']
})
export class FiltroComponent implements OnInit {

  public filtro:any;

  constructor(private service: ConexaoService) { }

  ngOnInit() {
  }

  public buscarNome(nome:string){
    this.service.getNome(nome);
  }

  public buscarValorMin(val:string){
    this.service.getMinValue(val).then(
      (res) => {
        this.filtro = res;
    });
  }

}
