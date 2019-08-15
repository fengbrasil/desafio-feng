export interface ColumnSettings {
    field: string;
    title: string;
    width: string;
    filterable?: boolean;
    hidden?: boolean;
    type: 'text' | 'numeric' | 'boolean' | 'date';
}
