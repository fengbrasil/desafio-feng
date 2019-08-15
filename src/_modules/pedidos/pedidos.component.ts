import { Component, OnInit } from '@angular/core';
import { PedidosService } from '../../app/shared/services/pedidos.service';
import {
  SelectableSettings,
  GridDataResult,
  DataStateChangeEvent,
  PageChangeEvent
} from '@progress/kendo-angular-grid';
import { process, State } from '@progress/kendo-data-query';
import { IntlService, CldrIntlService } from '@progress/kendo-angular-intl';

@Component({
  selector: 'app-pedidos',
  templateUrl: './pedidos.component.html',
  styleUrls: ['./pedidos.component.css'],
  providers: [PedidosService]
})
export class PedidosComponent implements OnInit {
  loading = false;
  selectableSettings: SelectableSettings;

  gridDataRes;
  gridData: GridDataResult;

  mySelection: number[] = [];
  selectedRow;
  state: State = {
    skip: 0,
    take: 10,
  };

  setSelectableSettings(): void {
    this.selectableSettings = {
      checkboxOnly: false,
      mode: 'single',
      enabled: true
    };
  }
  constructor(
    private pedidosService: PedidosService,
  ) {
    this.setSelectableSettings();
  }

  ngOnInit() {
    this.getPedidos();
  }

  getPedidos() {
    this.pedidosService.getAll().subscribe(
      res => {
        res.map(pedido => {
          pedido.date = new Date(pedido.date);
        });
        this.gridData = res;
        this.gridDataRes = res;
      },
      err => {

      }
    );
  }

  cellClick($event) {
    console.log($event.dataItem);
  }

  dataStateChange(state: DataStateChangeEvent): void {
    this.state = state;
    this.gridData = process(this.gridDataRes, this.state);
  }

  paginarGrid(evento: PageChangeEvent) {
    this.state.skip = evento.skip;
    this.state.take = evento.take;

    this.gridData = process(this.gridDataRes, this.state);
  }


}

