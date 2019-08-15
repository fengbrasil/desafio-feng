import { Component, OnInit, ViewChild, TemplateRef } from '@angular/core';
import { PedidosService } from '@shared/services/pedidos.service';
import {
  SelectableSettings,
  GridDataResult,
  DataStateChangeEvent,
  PageChangeEvent
} from '@progress/kendo-angular-grid';
import { process, State } from '@progress/kendo-data-query';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { PedidoDTO } from '@shared/models/pedido.model';
import { Subject } from 'rxjs';
import { ColumnSettings } from '@shared/components/datatable/interfaces/columnSettings';

@Component({
  selector: 'app-pedidos',
  templateUrl: './pedidos.component.html',
  styleUrls: ['./pedidos.component.css'],
  providers: [PedidosService]
})
export class PedidosComponent implements OnInit {
  @ViewChild('modalDetalharPedido', null) modalDetalharPedido: TemplateRef<any>;

  loading = false;
  selectableSettings: SelectableSettings;

  gridDataRes: any;
  gridData: GridDataResult;

  gridSchema: ColumnSettings[] = [
    {
      field: 'name',
      title: 'Item',
      width: '10%',
      type: 'text'
    },
    {
      field: 'description',
      title: 'Descrição',
      width: '10%',
      type: 'text'
    },
    {
      field: 'quantity',
      title: 'Quantidade',
      width: '10%',
      type: 'text'
    },
    {
      field: 'value',
      title: 'Valor',
      width: '10%',
      type: 'numeric'
    },
  ];

  mySelection: number[] = [];
  selectedRow: PedidoDTO;
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
    private modal: NgbModal
  ) {
    this.setSelectableSettings();
  }

  ngOnInit() {
    this.getPedidos();
  }

  getPedidos() {
    this.loading = true;
    this.pedidosService.getAll().subscribe(
      res => {
        res.map(pedido => {
          pedido.date = new Date(pedido.date);
        });
        this.gridData = res;
        this.gridDataRes = res;
        this.loading = false;
      },
      err => {
        console.error(err);
        this.loading = false;
      }
    );
  }

  cellClick(row) {
    console.log(row.dataItem);
    this.selectedRow = row.dataItem;

    this.modal.open(this.modalDetalharPedido, { size: 'lg', centered: true });
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

