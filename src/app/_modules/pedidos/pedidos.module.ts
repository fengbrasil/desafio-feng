import { NgModule, LOCALE_ID } from '@angular/core';
import { CommonModule, registerLocaleData } from '@angular/common';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { HttpClientModule } from '@angular/common/http';

import {
  MatCardModule,
  MatFormFieldModule,
  MatInputModule
} from '@angular/material';

import { NgxLoadingModule } from 'ngx-loading';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

import { GridModule } from '@progress/kendo-angular-grid';
import { IntlModule } from '@progress/kendo-angular-intl';
import '@progress/kendo-angular-intl/locales/pt/all';
import '@progress/kendo-angular-intl/locales/pt/calendar';
import '@progress/kendo-angular-intl/locales/pt/currencies';
import '@progress/kendo-angular-intl/locales/pt/numbers';
import localePt from '@angular/common/locales/pt';
registerLocaleData(localePt, 'pt');

import { DataTableModule } from '@shared/components/datatable/datatable.module';
import { PedidosComponent } from './pedidos.component';

@NgModule({
  declarations: [
    PedidosComponent,
  ],
  imports: [
    CommonModule,
    IntlModule,
    HttpClientModule,
    GridModule,
    BrowserAnimationsModule,
    NgxLoadingModule,
    NgbModule,
    MatCardModule,
    MatFormFieldModule,
    MatInputModule,
    DataTableModule
  ],
  exports: [
    PedidosComponent
  ],
  providers: [
    { provide: LOCALE_ID, useValue: 'pt' }
  ]
})
export class PedidosModule { }
