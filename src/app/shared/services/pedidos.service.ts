
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { PedidoDTO } from '../models/pedido.model';

@Injectable()
export class PedidosService {
  url = 'http://localhost:3000';

  constructor(private http: HttpClient) { }

  getAll(): Observable<PedidoDTO[]> {
    return this.http.get<PedidoDTO[]>(`${this.url}/pedidos`);
  }
}
