import { Component, OnInit } from '@angular/core';
import { ClientDTO } from '@shared/models/client.model';
import { ColumnSettings } from '@shared/components/datatable/interfaces/columnSettings';
import { SelectableSettings } from '@progress/kendo-angular-grid';
import { PedidosService } from './shared/services/pedidos.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {


  ngOnInit() {
  }

}
