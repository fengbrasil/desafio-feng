import { TestBed } from '@angular/core/testing';

import { ConexaoService } from './conexao.service';

describe('ConexaoService', () => {
  beforeEach(() => TestBed.configureTestingModule({}));

  it('should be created', () => {
    const service: ConexaoService = TestBed.get(ConexaoService);
    expect(service).toBeTruthy();
  });
});
