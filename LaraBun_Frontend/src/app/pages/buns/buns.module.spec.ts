import { BunsModule } from './buns.module';

describe('BunsModule', () => {
  let bunsModule: BunsModule;

  beforeEach(() => {
    bunsModule = new BunsModule();
  });

  it('should create an instance', () => {
    expect(bunsModule).toBeTruthy();
  });
});
