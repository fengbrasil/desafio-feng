import {
  Component,
  OnInit,
  ViewChild,
  TemplateRef
} from '@angular/core';

import {
  SelectableSettings,
  GridDataResult,
  DataStateChangeEvent,
  PageChangeEvent
} from '@progress/kendo-angular-grid';

import { process, State } from '@progress/kendo-data-query';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';

import { PedidoDTO } from '@shared/models/pedido.model';
import { ColumnSettings } from '@shared/components/datatable/interfaces/columnSettings';
import { PedidosService } from '@shared/services/pedidos.service';

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

  // Necessário para a paginação do front side. Guarda a data não modificada.
  gridDataRes: any;

  // Conteúdo da grid.
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

  // Responsável pela paginação da grid
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
        /* Foi necessário fazer essa transformação do Date
         para que o filtro de data pudesse funcionar. */
        res.map(pedido => {
          pedido.date = new Date(pedido.date);
        });
        this.gridData = process(res, this.state);
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
    // Pega os dados da linha selecionada
    this.selectedRow = row.dataItem;

    this.modal.open(this.modalDetalharPedido, { size: 'lg', centered: true });
  }

  // Controla a exibição dos dados na grid de acordo com o que foi modificado.
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

