export class PedidoDTO {
    id: number;
    value: string;
    date: Date;
    items: [{
        name: string;
        description: string;
        quantity: number;
        value: number;
    }];
}
