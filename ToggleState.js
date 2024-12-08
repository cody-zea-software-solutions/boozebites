function utilState(initialValue) {
  let state = initialValue;

  const getState = () => state;

  const setState = (newValue) => {
    state = newValue;
    console.log(`State updated to: ${state}`);
  };

  return [getState, setState];
}
